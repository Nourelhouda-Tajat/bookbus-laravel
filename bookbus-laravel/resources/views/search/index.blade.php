<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SATAS Bus - Réservation</title>
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
<body class="bg-gradient-to-br from-satas-beige to-satas-brown min-h-screen flex items-center justify-center p-4">
    
    <div class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-md">
        
        <!-- Logo SATAS -->
        <div class="text-center mb-8">
            <div class="flex items-center justify-center mb-4">
                <i class="fas fa-bus text-6xl text-satas-orange"></i>
                <span class="ml-3 text-5xl">🐪</span>
            </div>
            <h1 class="text-4xl font-bold text-satas-brown mb-2">
                SATAS Bus
            </h1>
            <p class="text-satas-gray text-lg">رحلات كثيرة، حلة جديدة</p>
            <p class="text-satas-gray">Votre voyage commence ici</p>
        </div>

        <!-- Messages d'erreur -->
        <?php if ($errors->any()): ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded mb-6">
                <p class="font-bold"><i class="fas fa-exclamation-triangle"></i> Erreurs :</p>
                <ul class="list-disc list-inside mt-2">
                    <?php foreach ($errors->all() as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Formulaire -->
        <form action="<?php echo route('search.results'); ?>" method="GET" id="searchForm">
            
            <!-- Ville de départ -->
            <div class="mb-6">
                <label class="block text-satas-brown font-bold mb-2 text-lg">
                    <i class="fas fa-map-marker-alt text-green-600"></i> Ville de départ
                </label>
                <select name="ville_depart" id="ville_depart" 
                        class="w-full px-4 py-3 border-2 border-satas-beige rounded-lg focus:outline-none focus:ring-2 focus:ring-satas-orange focus:border-satas-orange transition" 
                        required>
                    <option value="">-- Choisissez une ville --</option>
                    <?php foreach($villes as $ville): ?>
                        <option value="<?php echo $ville->id; ?>">
                            <?php echo $ville->nom_ville; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Ville d'arrivée -->
            <div class="mb-6">
                <label class="block text-satas-brown font-bold mb-2 text-lg">
                    <i class="fas fa-map-marker-alt text-red-600"></i> Ville d'arrivée
                </label>
                <select name="ville_arrivee" id="ville_arrivee" 
                        class="w-full px-4 py-3 border-2 border-satas-beige rounded-lg focus:outline-none focus:ring-2 focus:ring-satas-orange focus:border-satas-orange transition" 
                        required>
                    <option value="">-- Choisissez une destination --</option>
                    <?php foreach($villes as $ville): ?>
                        <option value="<?php echo $ville->id; ?>">
                            <?php echo $ville->nom_ville; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <p id="error-same-city" class="text-red-600 text-sm mt-2 hidden font-semibold">
                    <i class="fas fa-exclamation-circle"></i> La ville d'arrivée doit être différente
                </p>
            </div>

            <!-- Date de départ -->
            <div class="mb-6">
                <label class="block text-satas-brown font-bold mb-2 text-lg">
                    <i class="fas fa-calendar-alt text-satas-orange"></i> Date de départ
                </label>
                <input type="date" 
                       name="date_depart" 
                       id="date_depart" 
                       min="<?php echo date('Y-m-d'); ?>"
                       value="<?php echo date('Y-m-d'); ?>"
                       class="w-full px-4 py-3 border-2 border-satas-beige rounded-lg focus:outline-none focus:ring-2 focus:ring-satas-orange focus:border-satas-orange transition" 
                       required>
            </div>

            <!-- Nombre de voyageurs -->
            <div class="mb-6">
                <label class="block text-satas-brown font-bold mb-2 text-lg">
                    <i class="fas fa-users text-satas-gray"></i> Nombre de voyageurs
                </label>
                <select name="nombre_voyageurs" 
                        class="w-full px-4 py-3 border-2 border-satas-beige rounded-lg focus:outline-none focus:ring-2 focus:ring-satas-orange focus:border-satas-orange transition" 
                        required>
                    <?php for($i = 1; $i <= 10; $i++): ?>
                        <option value="<?php echo $i; ?>">
                            <?php echo $i; ?> <?php echo $i > 1 ? 'voyageurs' : 'voyageur'; ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </div>

            <!-- Bouton recherche -->
            <button type="submit" 
                    class="w-full bg-gradient-to-r from-satas-orange to-amber-600 text-white font-bold py-4 rounded-lg hover:from-amber-600 hover:to-satas-orange transition transform hover:scale-105 shadow-lg">
                <i class="fas fa-search"></i> Rechercher des trajets
            </button>
        </form>

        <!-- Avantages SATAS -->
        <div class="grid grid-cols-3 gap-4 mt-8">
            <div class="text-center">
                <div class="bg-satas-beige bg-opacity-30 rounded-lg p-4 hover:bg-opacity-50 transition">
                    <i class="fas fa-shield-alt text-satas-orange text-3xl"></i>
                    <p class="text-xs mt-2 text-satas-brown font-semibold">Sécurisé</p>
                </div>
            </div>
            <div class="text-center">
                <div class="bg-satas-beige bg-opacity-30 rounded-lg p-4 hover:bg-opacity-50 transition">
                    <i class="fas fa-clock text-satas-orange text-3xl"></i>
                    <p class="text-xs mt-2 text-satas-brown font-semibold">Ponctuel</p>
                </div>
            </div>
            <div class="text-center">
                <div class="bg-satas-beige bg-opacity-30 rounded-lg p-4 hover:bg-opacity-50 transition">
                    <i class="fas fa-star text-satas-orange text-3xl"></i>
                    <p class="text-xs mt-2 text-satas-brown font-semibold">Qualité</p>
                </div>
            </div>
        </div>

        <!-- Footer avec chameau -->
        <div class="text-center mt-6 text-satas-gray">
            <p class="text-sm">🐪 Voyagez avec confiance</p>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        const villeDepart = document.getElementById('ville_depart');
        const villeArrivee = document.getElementById('ville_arrivee');
        const errorMsg = document.getElementById('error-same-city');

        function checkSameCity() {
            if (villeDepart.value && villeArrivee.value && villeDepart.value === villeArrivee.value) {
                errorMsg.classList.remove('hidden');
                villeArrivee.classList.add('border-red-500');
                return false;
            } else {
                errorMsg.classList.add('hidden');
                villeArrivee.classList.remove('border-red-500');
                return true;
            }
        }

        villeDepart.addEventListener('change', checkSameCity);
        villeArrivee.addEventListener('change', checkSameCity);

        document.getElementById('searchForm').addEventListener('submit', function(e) {
            if (!checkSameCity()) {
                e.preventDefault();
            }
        });
    </script>
</body>
</html>