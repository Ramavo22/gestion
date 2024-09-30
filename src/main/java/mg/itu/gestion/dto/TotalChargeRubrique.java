package mg.itu.gestion.dto;

import java.util.List;
import mg.itu.gestion.entity.Rubrique;

public class TotalChargeRubrique {

    private Rubrique rubrique;
    private Double montantTotalCumule;
    private List<TotalChargeCentre> chargeCentres; // Liste des charges par centre

    // Constructeur
    public TotalChargeRubrique(Rubrique rubrique, Double montantTotalCumule, List<TotalChargeCentre> chargeCentres) {
        this.rubrique = rubrique;
        this.montantTotalCumule = montantTotalCumule;
        this.chargeCentres = chargeCentres;
    }

    // Getters et Setters
    public Rubrique getRubrique() {
        return rubrique;
    }

    public void setRubrique(Rubrique rubrique) {
        this.rubrique = rubrique;
    }

    public Double getMontantTotalCumule() {
        return montantTotalCumule;
    }

    public void setMontantTotalCumule(Double montantTotalCumule) {
        this.montantTotalCumule = montantTotalCumule;
    }

    public List<TotalChargeCentre> getChargeCentres() {
        return chargeCentres;
    }

    public void setChargeCentres(List<TotalChargeCentre> chargeCentres) {
        this.chargeCentres = chargeCentres;
    }

    @Override
    public String toString() {
        return "TotalChargeRubrique{" +
                "rubrique=" + rubrique.getLabel() +
                ", montantTotalCumule=" + montantTotalCumule +
                ", chargeCentres=" + chargeCentres +
                '}';
    }
}
