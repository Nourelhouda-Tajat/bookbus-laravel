<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Programme;
use App\Models\Reservation;

class StoreReservationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // pas de login
    }

    public function rules(): array
    {
        return [
            'programme_id' => 'required|exists:programmes,id',
            'segment_id' => 'required|exists:segments,id',
            'nombre_voyageurs' => 'required|integer|min:1|max:10',

            'passagers' => 'required|array',
            'passagers.*.nom' => 'required|string|min:3|max:100',
            'passagers.*.cin' => 'required|string|min:4|max:20',
            'passagers.*.date_naissance' => 'required|date',
            'passagers.*.type' => 'required|in:adulte,enfant',

            // cas spécial (besoins spéciaux)
            'passagers.*.remarques' => 'nullable|string|max:255',

            // options
            'option_assurance' => 'nullable|boolean',
            'option_snack' => 'nullable|boolean',
            'option_premium' => 'nullable|boolean',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            // Vérifier nombre de formulaires passagers
            if (count($this->passagers) != $this->nombre_voyageurs) {
                $validator->errors()->add('passagers', "Le nombre de passagers ne correspond pas.");
            }

            // Vérifier places disponibles (première vérification)
            $programme = Programme::with('bus')->find($this->programme_id);

            if (!$programme) {
                $validator->errors()->add('programme_id', "Programme introuvable.");
                return;
            }

            $placesReservees = Reservation::where('programme_id', $programme->id)->sum('nombre_voyageurs');
            $placesDisponibles = $programme->bus->capacite - $placesReservees;

            if ($placesDisponibles < $this->nombre_voyageurs) {
                $validator->errors()->add('places', "Places insuffisantes. Il reste seulement $placesDisponibles places.");
            }
        });
    }

    public function messages(): array
    {
        return [
            'passagers.required' => 'Vous devez ajouter au moins un passager.',
            'passagers.*.nom.required' => 'Le nom du passager est obligatoire.',
            'passagers.*.cin.required' => 'Le CIN est obligatoire.',
            'passagers.*.type.in' => 'Type invalide (adulte/enfant).',
        ];
    }
}
