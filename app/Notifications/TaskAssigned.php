<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Task; // ✅ Import Task model

class TaskAssigned extends Notification
{
    use Queueable;

    public $task; // ✅ Définir la propriété task

    /**
     * Create a new notification instance.
     */
    public function __construct(Task $task) // ✅ Injecter la tâche
    {
        $this->task = $task;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Nouvelle tâche assignée')
            ->line("Une tâche vous a été assignée : {$this->task->title}")
            ->action('Voir la tâche', url('/tasks/' . $this->task->id));
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray(object $notifiable): array
    {
        return [
            'task_id' => $this->task->id,
            'title' => $this->task->title,
        ];
    }
}
