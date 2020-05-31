<?php

namespace loweffortgooglecalendar\Application\CreateNewSchedule;

use loweffortgooglecalendar\Domain\Exception\InvalidEmailDomainException;
use loweffortgooglecalendar\Domain\Model\User;
use loweffortgooglecalendar\Domain\Model\Schedule;
use loweffortgooglecalendar\Domain\Repository\ScheduleRepository;

class CreateNewScheduleService
{
    private $scheduleRepository;

    public function __construct(
        ScheduleRepository $scheduleRepository)
    {
        $this->scheduleRepository = $scheduleRepository;
    }

    /**
     * @param CreateNewScheduleRequest $request
     * @return CreateNewScheduleResponse
     */
    public function handle(CreateNewScheduleRequest $request) : CreateNewScheduleResponse
    {
        try {
            $schedule = Schedule::makeSchedule($request->getScheduleTitle(), $request->getScheduleDescription(), new User($request->getUserName(), $request->getScheduleDate()));
            $response = $this->scheduleRepository->save($schedule);

            return new CreateNewScheduleResponse($response, "Schedule created successfully.");
        } catch (InvalidEmailDomainException $domainException) {
            return new CreateNewScheduleResponse($domainException, $domainException->getMessage(), 400, true);
        } catch (\Exception $exception) {
            return new CreateNewScheduleResponse($exception, $exception->getMessage(), 500, true);
        }
    }

}