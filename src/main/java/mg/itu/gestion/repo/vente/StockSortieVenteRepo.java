package mg.itu.gestion.repo.vente;

import org.springframework.data.jpa.repository.JpaRepository;

import mg.itu.gestion.entity.vente.StockVenteSortie;

public interface StockSortieVenteRepo extends JpaRepository<StockVenteSortie, Long>{
    
}
