<?php
namespace App\Exports;

use App\Models\Rapport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Carbon\Carbon;

class RapportExport implements FromCollection, WithHeadings, WithStyles
{
        
    protected $records;

    public function __construct($records)
    {
        $this->records = $records;
    }
        
    public function collection()
    {
        $totalMontPos = 0; // Initialisation de la variable
        $totalMontCash = 0; // Initialisation de la variable
        $totalTicket = 0;
        $totalRates = 0;
        $totalTrans = 0;
        $totalEcart = 0;
        
        // Récupérer les données des rapports
        $rapports = $this->records->map(function ($rapport, $index) use (&$totalMontPos, &$totalMontCash, &$totalTicket, &$totalRates, &$totalTrans, &$totalEcart) {
            // Accumulateur pour la somme
            $totalMontPos += $rapport->Mont_Pos;
            $totalMontCash += $rapport->Mont_Cash;
            $totalTicket += $rapport->Tickets;
            $totalRates += $rapport->Ratés;
            $totalTrans += $rapport->Transport;
            $totalEcart += $rapport->ecart;
            
            return [
                'Numéro' => $index + 1, // Ajoute le numéro d'ordre (incrémenté)
                'Nom' => $rapport->user ? $rapport->user->name : 'Utilisateur inconnu', // Vérifie si l'utilisateur est défini
                'Tickets' => $rapport->Tickets,
                'Ratés' => $rapport->Ratés,
                'Mont_Pos' => $rapport->Mont_Pos,
                'Mont_cash' => $rapport->Mont_Cash,
                'Transport' => $rapport->Transport,
                'Ecart' => $rapport->ecart,
                'Obs' => $rapport->Obs,
                'Date' => $rapport->created_at,
            ];
        });
    
        // Convertir les données en tableau
        $data = $rapports->toArray();
    
        // Ajouter des lignes vides pour décaler les données vers la 5ème ligne
        $emptyRows = array_fill(0, 4, array_fill(0, 10, '')); // 4 lignes vides de 10 colonnes (ajuster le nombre de colonnes si nécessaire)
        $header = ['Numéro','Nom','Tickets','Ratés','Mont_Pos','Mont_cash','Transport','Ecart','Obs','Date'];
        // Ajouter les lignes vides avant les données
        $data = array_merge($emptyRows, [$header], $data);
    
        // Ajouter une ligne de total à la fin des données
        $data[] = [
            'TOTAL', '', $totalTicket, $totalRates, $totalMontPos, $totalMontCash, $totalTrans, $totalEcart, '', ''
        ]; // Ajuste les valeurs et le nombre de colonnes si nécessaire
    
        return collect($data);
    }


  public function headings(): array
    {
        return [
            ['']
        ];
    }

    public function styles(Worksheet $sheet)
    {
        
      // Ajouter le logo
        $logoPath = public_path('images/ville.png'); // Chemin vers ton logo
        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('Logo');
        $drawing->setPath($logoPath);
        $drawing->setHeight(80); // Hauteur du logo
        $drawing->setCoordinates('B2'); // Positionner le logo
        $drawing->setWorksheet($sheet);
        
        // Ajouter le titre
        $sheet->mergeCells('A1:J2'); // Fusionner les cellules pour le titre
        $sheet->setCellValue('A1', 'TAXE DE STATIONNEMENT'); // Définir le titre
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER); // Centrer le titre
        $sheet->getStyle('A1')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16); // Style du titre
        
        // Ajouter le titre
        $sheet->mergeCells('A3:J4'); // Fusionner les cellules pour le titre<
        $sheet->setCellValue('A3', 'Rapport Journalière'); // Définir le titre
        $sheet->getStyle('A3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER); // Centrer le titre
        $sheet->getStyle('A3')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A3')->getFont()->setBold(true)->setSize(14); // Style du titre
        
        $lastRow = $sheet->getHighestRow();
        $highestRow = $sheet->getHighestRow(); // Récupérer la dernière ligne utilisée
        $highestColumn = $sheet->getHighestColumn();
        
        return [
            // Style la première ligne (les en-têtes)
            "A5:{$highestColumn}{$highestRow}" => [ // Plage de A1 à la dernière cellule
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN, // Style de bordure
                        'color' => ['argb' => 'FF000000'], // Couleur de bordure
                    ],
                ],
            ],
            5 => [
                'font' => [
                     'color' => [
                        'argb' => 'ffffff', // Couleur du texte
                    ],
                    'bold' => true
                    ], 
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => '2e334b', // Couleur de fond
                    ],
                ],],
            $lastRow => [
                'font' => [
                     'color' => [
                        'argb' => 'ffffff', // Couleur du texte
                    ],
                    'bold' => true
                    ], 
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => '2e334b', // Couleur de fond
                    ],
                ],],
        ];
    }
}