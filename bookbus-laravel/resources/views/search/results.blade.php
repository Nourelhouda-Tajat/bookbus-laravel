<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats - SATAS Bus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'satas-brown': '#8B7355',
                        'satas-beige': '#D2B48C',
                        'satas-orange': '#FF8C00',
                        'satas-gray': '#6B7280',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
    
    <!-- Header SATAS -->
    <div class="bg-gradient-to-r from-satas-brown to-satas-beige text-white py-8 shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex items-center">
                <i class="fas fa-bus text-5xl mr-3"></i>
                <span class="text-4xl mr-3">🐪</span>
                <div>
                    <h1 class="text-3xl font-bold">SATAS Bus</h1>
                    <p class="text-satas-beige">رحلات كثيرة، حلة جديدة</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        
        <!-- Résumé recherche -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8 border-l-4 border-satas-orange">
            <div class="flex justify-between items-center flex-wrap gap-4">
                <div>
                    <h2 class="text-2xl font-bold mb-3 text-satas-brown">
                        <i class="fas fa-map-marker-alt text-green-600"></i> {{ $villeDepart->nom_ville }}
                        <i class="fas fa-arrow-right mx-3 text-satas-orange"></i>
                        <i class="fas fa-map-marker-alt text-red-600"></i> {{ $villeArrivee->nom_ville }}
                    </h2>
                    <p class="text-satas-gray text-lg">
                        <i class="fas fa-calendar text-satas-orange"></i> {{ \Carbon\Carbon::parse($dateDepart)->format('d/m/Y') }}
                        <span class="mx-3 text-satas-beige">|</span>
                        <i class="fas fa-users text-satas-orange"></i> {{ $nombreVoyageurs }} {{ $nombreVoyageurs > 1 ? 'voyageurs' : 'voyageur' }}
                    </p>
                </div>
                <a href="{{ route('search.index') }}" 
                   class="bg-satas-orange hover:bg-amber-600 text-white px-6 py-3 rounded-lg font-semibold transition transform hover:scale-105 shadow-md">
                    <i class="fas fa-search"></i> Nouvelle recherche
                </a>
            </div>
        </div>

        <!-- Résultats -->
        @if(isset($trajets) && $trajets->count() > 0)
            <div class="mb-6 flex items-center">
                <div class="bg-satas-orange text-white px-4 py-2 rounded-full font-bold">
                    {{ $trajets->count() }} trajet(s)
                </div>
                <p class="ml-4 text-satas-gray">disponible(s)</p>
            </div>

            @foreach($trajets as $resultat)
                @php
                    $trajet = $resultat['programme'];
                @endphp
                <div class="bg-white rounded-xl shadow-md hover:shadow-2xl p-6 mb-5 transition-all duration-300 border border-satas-beige hover:border-satas-orange">
                    <div class="flex justify-between items-center flex-wrap gap-4">
                        <!-- Heure départ -->
                        <div class="text-center">
                            <div class="bg-green-100 px-4 py-2 rounded-lg mb-2">
                                <h4 class="text-2xl font-bold text-green-700">{{ $trajet->heure_depart }}</h4>
                            </div>
                            <p class="text-satas-gray font-semibold">
                                <i class="fas fa-arrow-up"></i> Départ
                            </p>
                        </div>

                        <!-- Prix -->
                        <div class="text-center">
                            <div class="bg-satas-orange text-white px-6 py-3 rounded-lg">
                                <h4 class="text-2xl font-bold">{{ $resultat['tarif'] }} MAD</h4>
                            </div>
                            <p class="text-satas-gray text-sm mt-1">Prix par personne</p>
                        </div>

                        <!-- Heure arrivée -->
                        <div class="text-center">
                            <div class="bg-red-100 px-4 py-2 rounded-lg mb-2">
                                <h4 class="text-2xl font-bold text-red-700">{{ $trajet->heure_arrivee }}</h4>
                            </div>
                            <p class="text-satas-gray font-semibold">
                                <i class="fas fa-arrow-down"></i> Arrivée
                            </p>
                        </div>

                        <!-- Info bus -->
                        <div class="text-center bg-satas-beige bg-opacity-20 px-6 py-3 rounded-lg">
                            <h4 class="text-lg font-bold text-satas-brown">
                                <i class="fas fa-bus text-satas-orange"></i> {{ $trajet->bus->matricule }}
                            </h4>
                            <p class="text-satas-gray">
                                <i class="fas fa-chair"></i> {{ $trajet->bus->capacite }} places
                            </p>
                        </div>

                        <!-- Bouton réserver -->
                        <div>
                            <a href="{{ route('booking.create', [
    'programme_id' => $trajet->id,
    'segment_id' => $resultat['segment']->id,
    'nombre_voyageurs' => $nombreVoyageurs
]) }}" 
                               class="bg-gradient-to-r from-satas-orange to-amber-600 hover:from-amber-600 hover:to-satas-orange text-white px-8 py-4 rounded-lg font-bold transition transform hover:scale-105 shadow-lg inline-block">
                                <i class="fas fa-ticket-alt"></i> Réserver
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="bg-amber-50 border-l-4 border-amber-500 text-amber-800 p-8 rounded-lg shadow-md">
                <div class="flex items-center mb-4">
                    <i class="fas fa-exclamation-triangle text-4xl text-amber-600 mr-4"></i>
                    <h4 class="font-bold text-2xl">Aucun trajet disponible</h4>
                </div>
                <p class="text-lg">Désolé, aucun trajet SATAS n'est disponible pour cette recherche.</p>
                <p class="mt-2 text-satas-gray">🐪 Essayez une autre date ou un autre trajet.</p>
                <a href="{{ route('search.index') }}" 
                   class="mt-4 inline-block bg-satas-orange text-white px-6 py-3 rounded-lg hover:bg-amber-600 transition">
                    <i class="fas fa-search"></i> Modifier la recherche
                </a>
            </div>
        @endif
    </div>

    <!-- Footer -->
    <div class="bg-satas-brown text-white py-6 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p class="text-lg">🐪 SATAS Bus - Voyagez avec confiance</p>
            <p class="text-satas-beige text-sm mt-2">رحلات كثيرة، حلة جديدة</p>
        </div>
    </div>
</body>
</html>