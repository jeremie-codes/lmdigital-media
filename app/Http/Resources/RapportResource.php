<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RapportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'Tickets' => $this->Tickets,
            'Ratés' => $this->Ratés,
            'Mont_Pos' => $this->Mont_Pos,
            'Mont_Cash' => $this->Mont_Cash,
            'Transport' => $this->Transport,
            'ecart' => $this->ecart,
            'Obs' => $this->Obs,
            'created_at' => $this->created_at->format('d/m/Y'), // Formatage de la date
        ];
    }

    
}