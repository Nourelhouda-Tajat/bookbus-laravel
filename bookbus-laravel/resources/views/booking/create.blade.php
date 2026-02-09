<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation - SATAS Bus</title>

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

<body class="bg-gray-100">

<div class="container mx-auto px-4 py-8 max-w-4xl">

    <!-- Progress bar -->
    <div class="bg-white shadow-md rounded-xl p-4 mb-6">
        <p class="text-satas-brown font-bold mb-2">
            <i class="fas fa-route text-satas-orange"></i> Étape 2 / 3 : Informations réservation
        </p>
        <div class="w-full bg-gray-200 rounded-full h-3">
            <div class="bg-satas-orange h-3 rounded-full" style="width: 66%"></div>
        </div>
    </div>

    <!-- Erreurs -->
    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded mb-6">
            <p class="font-bold"><i class="fas fa-exclamation-triangle"></i> Erreurs :</p>
            <ul class="list-disc list-inside mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('booking.store') }}" method="POST" id="bookingForm">
        @csrf

        <input type="hidden" name="programme_id" value="{{ $programme->id }}">
        <input type="hidden" name="segment_id" value="{{ $segment->id }}">
        <input type="hidden" name="nombre_voyageurs" value="{{ $nombreVoyageurs }}">

        <!-- SECTION 1 : recap -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-6 border-l-4 border-satas-orange">
            <h2 class="text-2xl font-bold text-satas-brown mb-4">
                <i class="fas fa-ticket-alt text-satas-orange"></i> Récapitulatif du trajet
            </h2>

            <p class="text-lg font-semibold">
                <i class="fas fa-map-marker-alt text-green-600"></i>
                {{ $segment->etapeDepart->adresse }}
                <i class="fas fa-arrow-right mx-2 text-satas-orange"></i>
                <i class="fas fa-map-marker-alt text-red-600"></i>
                {{ $segment->etapeArrivee->adresse }}
            </p>

            <p class="text-satas-gray mt-2">
                <i class="fas fa-calendar-alt text-satas-orange"></i>
                {{ \Carbon\Carbon::parse($programme->date_depart)->format('d/m/Y') }}
                |
                <i class="fas fa-clock text-satas-orange"></i>
                {{ $programme->heure_depart }} → {{ $programme->heure_arrivee }}
            </p>

            <p class="mt-2 text-satas-gray">
                <i class="fas fa-bus text-satas-orange"></i>
                Bus : {{ $programme->bus->matricule }}
                ({{ $programme->bus->type }})
            </p>

            <p class="mt-2 font-bold text-satas-brown">
                Prix base : <span id="prixBase">{{ $prixBase }}</span> MAD / personne
            </p>

            <p class="mt-2 text-green-700 font-semibold">
                <i class="fas fa-chair"></i>
                Places restantes : {{ $placesDisponibles }}
            </p>
        </div>


        <!-- SECTION 2 : passagers -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
            <h2 class="text-2xl font-bold text-satas-brown mb-4">
                <i class="fas fa-users text-satas-orange"></i> Informations des passagers
            </h2>

            <p class="text-satas-gray mb-4">
                Veuillez remplir les informations pour chaque passager.
            </p>

            @for($i=0; $i < $nombreVoyageurs; $i++)
                <div class="border border-gray-200 rounded-xl p-4 mb-4">
                    <h3 class="font-bold text-satas-brown mb-3">
                        Passager {{ $i+1 }}
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="font-semibold text-satas-brown">Nom complet *</label>
                            <input type="text" name="passagers[{{ $i }}][nom]"
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-satas-orange"
                                   required>
                        </div>

                        <div>
                            <label class="font-semibold text-satas-brown">CIN *</label>
                            <input type="text" name="passagers[{{ $i }}][cin]"
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-satas-orange"
                                   required>
                        </div>

                        <div>
                            <label class="font-semibold text-satas-brown">Date de naissance *</label>
                            <input type="date" name="passagers[{{ $i }}][date_naissance]"
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-satas-orange"
                                   required>
                        </div>

                        <div>
                            <label class="font-semibold text-satas-brown">Type *</label>
                            <select name="passagers[{{ $i }}][type]"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-satas-orange"
                                    required>
                                <option value="adulte">Adulte</option>
                                <option value="enfant">Enfant</option>
                            </select>
                        </div>
                    </div>
                </div>
            @endfor
        </div>


        <!-- SECTION 3 : options -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
            <h2 class="text-2xl font-bold text-satas-brown mb-4">
                <i class="fas fa-plus-circle text-satas-orange"></i> Options SATAS
            </h2>

            <div class="space-y-4">
                <label class="flex items-center justify-between border p-4 rounded-lg cursor-pointer hover:bg-gray-50">
                    <div>
                        <p class="font-bold text-satas-brown">Assurance annulation</p>
                        <p class="text-sm text-satas-gray">+25 MAD par passager</p>
                    </div>
                    <input type="checkbox" id="assurance" name="option_assurance" value="1" class="w-5 h-5">
                </label>

                <label class="flex items-center justify-between border p-4 rounded-lg cursor-pointer hover:bg-gray-50">
                    <div>
                        <p class="font-bold text-satas-brown">Snack-box</p>
                        <p class="text-sm text-satas-gray">+15 MAD par passager</p>
                    </div>
                    <input type="checkbox" id="snack" name="option_snack" value="1" class="w-5 h-5">
                </label>

                <label class="flex items-center justify-between border p-4 rounded-lg cursor-pointer hover:bg-gray-50">
                    <div>
                        <p class="font-bold text-satas-brown">Siège Premium</p>
                        <p class="text-sm text-satas-gray">+30 MAD par passager</p>
                    </div>
                    <input type="checkbox" id="premium" name="option_premium" value="1" class="w-5 h-5">
                </label>
            </div>
        </div>


        <!-- SECTION 4 : calcul prix -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-6 border-l-4 border-green-500">
            <h2 class="text-2xl font-bold text-satas-brown mb-4">
                <i class="fas fa-calculator text-green-600"></i> Calcul du prix
            </h2>

            <div class="text-lg text-satas-gray space-y-2">
                <p>Prix base total : <span id="prixBaseTotal" class="font-bold text-satas-brown"></span> MAD</p>
                <p>Options total : <span id="prixOptionsTotal" class="font-bold text-satas-brown"></span> MAD</p>
                <hr>
                <p class="text-2xl font-bold text-green-700">
                    Total à payer : <span id="prixFinal"></span> MAD
                </p>
            </div>
        </div>


        <!-- Buttons -->
        <div class="flex justify-between">
            <a href="{{ route('search.index') }}"
               class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-3 rounded-lg font-bold">
                <i class="fas fa-arrow-left"></i> Retour
            </a>

            <button type="submit"
                    class="bg-gradient-to-r from-satas-orange to-amber-600 text-white px-8 py-3 rounded-lg font-bold hover:scale-105 transition shadow-lg">
                <i class="fas fa-check"></i> Confirmer réservation
            </button>
        </div>

    </form>

</div>


<script>
    const prixBase = parseFloat(document.getElementById("prixBase").innerText);
    const nb = {{ $nombreVoyageurs }};

    const assurance = document.getElementById("assurance");
    const snack = document.getElementById("snack");
    const premium = document.getElementById("premium");

    function updatePrix() {
        let baseTotal = prixBase * nb;
        let optionsTotal = 0;

        if (assurance.checked) optionsTotal += 25 * nb;
        if (snack.checked) optionsTotal += 15 * nb;
        if (premium.checked) optionsTotal += 30 * nb;

        document.getElementById("prixBaseTotal").innerText = baseTotal;
        document.getElementById("prixOptionsTotal").innerText = optionsTotal;
        document.getElementById("prixFinal").innerText = baseTotal + optionsTotal;
    }

    assurance.addEventListener("change", updatePrix);
    snack.addEventListener("change", updatePrix);
    premium.addEventListener("change", updatePrix);

    updatePrix();
</script>

</body>
</html>
