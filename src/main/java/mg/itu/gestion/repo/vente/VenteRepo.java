package mg.itu.gestion.repo.vente;

import org.springframework.data.jpa.repository.JpaRepository;

import mg.itu.gestion.entity.vente.Vente;

public interface VenteRepo extends JpaRepository<Vente,Long>{
    
}
