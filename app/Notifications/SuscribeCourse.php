<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SuscribeCourse extends Notification
{
    use Queueable;

    protected $course;
    protected $group;
    protected $schedules_string;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($course, $group, $schedules_string)
    {
        $this->course = $course;
        $this->group = $group;
        $this->schedules_string = $schedules_string;
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                ->subject('Inscripción exitosa')
                ->greeting('Buen día,')
                ->line('Usted ha sido matriculado en la actividad de formación: "'.$this->course->title.'".')
                ->line('Los datos del grupo son los siguientes:')
                ->line('Nombre: '.$this->group->name)
                ->line('Fecha de inicio: '.$this->course->fecha_inicio)
                ->line('Fecha de finalización: '.$this->course->fecha_fin)
                ->line('Horario: '.$this->schedules_string)
                ->line('Lugar: '.$this->group->place)
                ->line('Recuerde que el cumplimiento de las actividades será el determinante para la aprobación de la misma. Para mas información del curso consulte en nuestro portal https://www.mujeresctiam.org')
                ->salutation('Gracias,');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
