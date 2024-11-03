package mg.itu.gestion.service.vente;

import java.time.LocalDate;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import mg.itu.gestion.entity.vente.Vente;
import mg.itu.gestion.repo.vente.VenteRepo;

@Service
public class VenteService {
    
    @Autowired
    StockVenteService stockVenteService;

    @Autowired
    VenteRepo venteRepo;

    public void AddVente(Integer qtes, Double pu){
        String designation = "Ventes de "+qtes+" cahier(s)";
        
        Vente vente = Vente.builder()
                    .designation(designation)
                    .qtes(qtes)
                    .pu(pu)
                    .build();
        
        Vente venteInserer = venteRepo.save(vente);

        stockVenteService.AddStockSortie(venteInserer);
    }

    
}
