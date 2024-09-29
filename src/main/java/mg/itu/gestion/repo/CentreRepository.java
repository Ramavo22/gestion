package mg.itu.gestion.repo;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import mg.itu.gestion.entity.Centre;

public interface CentreRepository extends JpaRepository<Centre,Short>{

    // Méthode de filtrage par libellé et type de centre
    List<Centre> findByLabelContainingAndCentreId(String label, Short typeCentreId);

    // Si seulement un des critères est fourni
    List<Centre> findByLabelContaining(String label);
    List<Centre> findByCentreId(Short typeCentreId);
}
