package mg.itu.gestion.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import mg.itu.gestion.service.NatureService;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;


@RequestMapping("nature")
@RestController
public class NatureController {
    
    @Autowired
    NatureService natureService;


    @GetMapping("/list")
    public ResponseEntity<?> getList() {
        return new ResponseEntity<>(natureService.findAll(),HttpStatus.OK);
    }
    
}
