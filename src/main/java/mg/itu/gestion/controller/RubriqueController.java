package mg.itu.gestion.controller;

import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import mg.itu.gestion.service.RubriqueService;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;

@RestController
@RequestMapping("rubrique")
public class RubriqueController {

    @Autowired
    RubriqueService rubriqueService;
    
    @GetMapping("/list")
    public ResponseEntity<?> getMethodName() {
        return new ResponseEntity<>(rubriqueService.findAll(),HttpStatus.OK);
    }

    @PostMapping("/add")
    public ResponseEntity<String> saveRubrique(@RequestBody RubriqueBody rubrique) {
        // Logique pour sauvegarder la rubrique
        rubriqueService.save(rubrique.getLabel(), rubrique.getTypeChargeId(), rubrique.getNatureId(), rubrique.getCentres(), rubrique.getPourcentages());

        return ResponseEntity.ok("Rubrique sauvegardée avec succès !");
    }

    public static class RubriqueBody {
        String label;
        Short typeChargeId;
        Short natureId;
        Integer[] centres;
        Double[] pourcentages;

        public String getLabel() {
            return label;
        }
        public Short getTypeChargeId() {
            return typeChargeId;
        }
        public Short getNatureId() {
            return natureId;
        }
        public Integer[] getCentres() {
            return centres;
        }
        public Double[] getPourcentages() {
            return pourcentages;
        }
    }

    
}
