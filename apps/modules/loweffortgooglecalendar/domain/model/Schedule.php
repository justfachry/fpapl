<?php

namespace loweffortgooglecalendar\Domain\Model;

use Exception;
use http\Client\Curl\User;
use Idy\Common\Events\DomainEventPublisher;
use Idy\Idea\Domain\Exception\InvalidRatingException;

class Idea
{
   
    private $id;   
    private $title;   
    private $description; 
    private $user;
    private $date;

    public function __construct(ScheduleId $id, string $title, string $description, Date $date , User $user)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->date = $date;
        $this->user = $user;

    }

    /**
     * @return IdeaId
     */
    public function id() : IdeaId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function title() : string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function description() : string
    {
        return $this->description;
    }

    /**
     * @return User
     */
    public function user() : user
    {
        return $this->user;
    }

    public function date()
    {
        return $this->date;
    }

    // /**
    //  * @param string $user
    //  * @param int $ratingValue
    //  * @return Rating
    //  * @throws InvalidRatingException
    //  */
    // public function addRating($user, $ratingValue)
    // {
    //     $newRating = new Rating($user, $ratingValue);

    //     if ($newRating->isValid()) {
    //         $exist = false;
    //         foreach ($this->ratings as $existingRating) {
    //             if ($existingRating->equals($newRating)) {
    //                 $exist = true;
    //             }
    //         }

    //         if (!$exist) {
    //             array_push($this->ratings, $newRating);
    //         } else {
    //             throw new InvalidRatingException('Author ' . $newRating->user() . ' has given a rating.');
    //         }

    //         DomainEventPublisher::instance()->publish(
    //             new IdeaRated($this->author->name(), $this->author->email(), 
    //                 $this->title, $ratingValue, $user)
    //         );

    //         return $newRating;
    //     }
    // }

    // public function vote()
    // {   
    //     $this->votes = $this->votes + 1;
    // }

    // /**
    //  * @return float
    //  */
    // public function averageRating() : float
    // {
    //     $numberOfRatings = count($this->ratings);
    //     if (! $numberOfRatings) return 0;

    //     $totalRatings = 0;

    //     foreach ($this->ratings as $rating) {
    //         $totalRatings += $rating->value();
    //     }

    //     return ($totalRatings / $numberOfRatings);
    // }

    /**
     * @param string $title
     * @param string $description
     * @param date $date
     * @param user $user
     * @return Schedule
     */
    public static function makeSchedule($title, $description, $date, $user) : Schedule
    {
        return new Schedule(new ScheduleId(), $title, $description, $date, $user);
    }
}