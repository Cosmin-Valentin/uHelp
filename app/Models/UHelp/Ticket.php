<?php

namespace App\Models\UHelp;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function assigner() {
        return $this->belongsTo(User::class, 'assigner_id');
    }

    public function assignee() {
        return $this->belongsTo(User::class, 'assignee_id');
    }

    public function category() {
        return $this->belongsTo(TicketCategory::class, 'category_id');
    }

    public function author() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function replies() {
        return $this->hasMany(TicketReply::class, 'ticket_id')->orderBy('created_at', 'desc');
    }

    public function getCustomTicketIdAttribute() {
        return '#SP-' . $this->id;
    }

    public function getStatusHtmlAttribute() {
        switch ($this->status) {
            case 'inProgress':
                if($this->created_at > Carbon::now()->subDays(2) && !isset($this->assignee_id)) {
                    return '<span class="badge badge-orange">New</span>';
                } else {
                    return '<span class="badge badge-info">In-Progress</span>';
                }
            case 'onHold' :
                return '<span class="badge badge-warning">On-Hold</span>';
            case 'reOpened' :
                return '<span class="badge badge-teal">Re-Opened</span>';
            case 'closed' :
                return '<span class="badge badge-danger">Closed</span>';
            default :
                return '';
        }
    }

    public function getPriorityHtmlAttribute() {
        switch ($this->priority) {
            case 'low':
                return '<span class="badge badge-success-light">Low</span>';
            case 'medium':
                return '<span class="badge badge-warning-light">Medium</span>';
            case 'high':
                return '<span class="badge badge-danger-light">High</span>';
            case 'critical':
                return '<span class="badge badge-danger-dark">Critical</span>';
            default :
                return '';
        }
    }
}
