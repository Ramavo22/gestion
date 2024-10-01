package mg.itu.gestion.controller;

import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import mg.itu.gestion.dto.TotalCharge_Centre;
import mg.itu.gestion.entity.Centre;
import mg.itu.gestion.service.ComptaAnalitique;

import java.util.HashMap;
import java.util.List;
import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;


@RestController
@RequestMapping("compta")
public class ComptaController {
    
    @Autowired
    ComptaAnalitique comptaAnalitique;

    @GetMapping("/repartition")
    public ResponseEntity<Map<String, Object>> getMethodName() {
        // Obtenir les données nécessaires
        List<TotalCharge_Centre> repartition = comptaAnalitique.getTotalChargeOperationnelRepartie(2024);
        List<TotalCharge_Centre> izyrehetra = comptaAnalitique.getTotalMontantByCentreForYear(2024);
        List<TotalCharge_Centre> struCentres = comptaAnalitique.getTotalChargeStruture(izyrehetra);
        List<TotalCharge_Centre> operation = comptaAnalitique.getTotalChargeOperationnel(izyrehetra);
        Map<String, Double> repartitionMap = comptaAnalitique.getRepartitionStructureParCentreOperationnel(struCentres, operation);

        // Préparer les données à renvoyer
        Map<String, Object> response = new HashMap<>();
        response.put("repartition", repartition);
        response.put("structure_centres", struCentres);
        response.put("operationnels", operation);
        response.put("repartition_structure", repartitionMap);

        // Retourner les données avec un statut HTTP 200 (OK)
        return ResponseEntity.ok(response);
        }
    
}
