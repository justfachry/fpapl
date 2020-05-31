<?php 

namespace loweffortgooglecalendar\Infrastructure\Persistence;

use loweffortgooglecalendar\Domain\Model\Schedule;
use loweffortgooglecalendar\Domain\Model\ScheduleId;
use loweffortgooglecalendar\Domain\Repository\ScheduleRepository;
use PDO;
use Phalcon\Db\Adapter\Pdo\Mysql;

class SqlScheduleRepository implements ScheduleRepository
{
    private $db;

    public function __construct(Mysql $db)
    {
        $this->db = $db;
    }

    public function byId(IdeaId $id)
    {
        $statement = sprintf("SELECT * FROM schedules WHERE schedule.id = :schedules_id");
        $param = ['schedule_id' => $id->id()];

        return $this->db->query($statement, $param)
            ->fetch(PDO::FETCH_ASSOC);
    }

    public function save(Idea $idea)
    {
        $statement = sprintf("INSERT INTO schedules(id, title, description, user, date) VALUES(:id, :title, :description, :user, :date)" );
        $params = ['id' => $schedule->id()->id() , 'title' => $schedule->title(), 'description' => $schedule->description(), 'user' => $schedule->user()->name(), 'date' => $schedule->date()];

        return $this->db->execute($statement, $params);
    }

    public function allSchedule()
    {
        $statement = sprintf("SELECT * FROM schedules");

        return $this->db->query($statement)
            ->fetchAll(PDO::FETCH_ASSOC);
    }
}