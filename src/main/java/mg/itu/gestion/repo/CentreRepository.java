package mg.itu.gestion.repo;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import mg.itu.gestion.entity.Centre;

public interface CentreRepository extends JpaRepository<Centre,Short>{

    // Méthode pour filtrer par libellé et type de centre (relation ManyToOne)
    List<Centre> findByLabelContainingAndTypecentreId(String label, Short typeCentreId);

    // Méthode pour filtrer uniquement par libellé
    List<Centre> findByLabelContaining(String label);

    // Méthode pour filtrer par TypeCentre seulement
    List<Centre> findByTypecentreId(Short typeCentreId);
}
