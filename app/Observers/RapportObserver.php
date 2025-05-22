<?php
   namespace App\Observers;
    
    use App\Models\Rapport;
    
    class RapportObserver
    {
        public function saving(Rapport $rapport)
        {
            // Calculer le champ 'ecart' avant la sauvegarde
            $rapport->ecart = ($rapport->Mont_Cash + $rapport->Transport) - $rapport->Mont_Pos;
        }
    }

