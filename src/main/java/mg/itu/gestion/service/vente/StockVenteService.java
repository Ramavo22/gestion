package mg.itu.gestion.service.vente;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import mg.itu.gestion.entity.vente.StockVenteSortie;
import mg.itu.gestion.repo.vente.StockEntreVenteRepo;
import mg.itu.gestion.repo.vente.StockSortieVenteRepo;

@Service
public class StockVenteService {
    
    @Autowired
    StockEntreVenteRepo stockEntreVenteRepo;

    @Autowired
    StockSortieVenteRepo stockSortieVenteRepo;
}
