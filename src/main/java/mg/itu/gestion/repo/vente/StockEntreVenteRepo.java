package mg.itu.gestion.repo.vente;

import org.springframework.data.jpa.repository.JpaRepository;

import mg.itu.gestion.entity.vente.StockVenteEntre;

public interface StockEntreVenteRepo extends JpaRepository<Long, StockVenteEntre>{
    
}
