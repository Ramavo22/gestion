package mg.itu.gestion.service.vente;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import mg.itu.gestion.entity.BilanDeSortie;
import mg.itu.gestion.entity.StockSortie;
import mg.itu.gestion.entity.vente.StockVenteEntre;
import mg.itu.gestion.entity.vente.StockVenteSortie;
import mg.itu.gestion.entity.vente.Vente;
import mg.itu.gestion.repo.vente.StockEntreVenteRepo;
import mg.itu.gestion.repo.vente.StockSortieVenteRepo;
import mg.itu.gestion.service.bonService.bilansortie.BilanDeSortieService;

@Service
public class StockVenteService {
    
    @Autowired
    StockEntreVenteRepo stockEntreVenteRepo;

    @Autowired
    StockSortieVenteRepo stockSortieVenteRepo;

    @Autowired
    BilanDeSortieService bilanDeSortieService;


    public void AddStockEntre(Long bilanDeSortieId, String designation, Integer qtes){
        BilanDeSortie bilanDeSortie = bilanDeSortieService.findById(bilanDeSortieId);

        StockVenteEntre newStockVente = StockVenteEntre.builder()
                                .bilanDeSortie(bilanDeSortie)
                                .designation(designation)
                                .qtes(qtes)
                                .build();
        
        stockEntreVenteRepo.save(newStockVente);
    }

    public void AddStockSortie(Vente vente){
        StockVenteSortie stockSortie = StockVenteSortie.builder()
                                    .designation(vente.getDesignation())
                                    .qtes(vente.getQtes())
                                    .vente(vente)
                                    .build();

        stockSortieVenteRepo.save(stockSortie);
    }
}
