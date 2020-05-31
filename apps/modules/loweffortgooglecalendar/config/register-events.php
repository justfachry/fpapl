<?php

use Common\Events\DomainEventPublisher;
use loweffortgooglecalendar\Application\SendRatingNotificationService;

DomainEventPublisher::instance()->subscribe(new SendRatingNotificationService($di->get('swiftMailer')));