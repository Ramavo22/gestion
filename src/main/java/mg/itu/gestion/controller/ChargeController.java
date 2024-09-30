package mg.itu.gestion.controller;

import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import mg.itu.gestion.dto.TotalChargeRubrique;
import mg.itu.gestion.service.ChargeService;

import java.sql.Date;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;


@RestController
@RequestMapping("charge")
public class ChargeController {

    @Autowired
    ChargeService chargeService;
    
    @GetMapping("/list")
    public ResponseEntity<?> getList() {
        return new ResponseEntity<>(chargeService.findAll(),HttpStatus.OK);
    }

    @PostMapping("/add")
    public ResponseEntity<?> inserted(@RequestParam Integer rubriqueId, @RequestParam Double montant_total, @RequestParam Short unityId, @RequestParam Date date ){
        chargeService.save(rubriqueId, montant_total, unityId, date);
        return ResponseEntity.ok("Inserted");
    }

    @GetMapping("/list2")
    public List<TotalChargeRubrique> getListe() {
        return chargeService.chargeCumulé();
    }


}
    

