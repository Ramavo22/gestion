package mg.itu.gestion.repo;

import org.springframework.data.jpa.repository.JpaRepository;

import mg.itu.gestion.entity.Nature;

public interface NatureRepository extends JpaRepository<Nature,Short>{
    
}
