package mg.itu.gestion.dto;

import mg.itu.gestion.entity.Centre;

public class TotalChargeCentre {

    private Centre centre;
    private Double montantTotalCumule;

    // Constructeurs
    public TotalChargeCentre(Centre centre, Double montantTotalCumule) {
        this.centre = centre;
        this.montantTotalCumule = montantTotalCumule;
    }

    // Getters et Setters
    public Centre getCentre() {
        return centre;
    }

    public void setCentre(Centre centre) {
        this.centre = centre;
    }

    public Double getMontantTotalCumule() {
        return montantTotalCumule;
    }

    public void setMontantTotalCumule(Double montantTotalCumule) {
        this.montantTotalCumule = montantTotalCumule;
    }

    // toString pour afficher les résultats
    @Override
    public String toString() {
        return "TotalChargeCentre{" +
                "centre=" + centre.getLabel() +
                ", montantTotalCumule=" + montantTotalCumule +
                '}';
    }
}
