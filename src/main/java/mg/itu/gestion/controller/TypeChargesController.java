package mg.itu.gestion.controller;

import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import mg.itu.gestion.service.TypeChargeService;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;


@RestController
@RequestMapping("type-charge")
public class TypeChargesController {

    @Autowired
    TypeChargeService typeChargeService;



    @GetMapping("/list")
    public ResponseEntity<?> getList() {
        return new ResponseEntity<>(typeChargeService.findAll(),HttpStatus.OK);
    }
    
}
