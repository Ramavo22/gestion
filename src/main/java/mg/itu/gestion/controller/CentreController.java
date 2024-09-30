package mg.itu.gestion.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import mg.itu.gestion.entity.Centre;
import mg.itu.gestion.repo.CentreRepository;
import mg.itu.gestion.service.CentreService;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;





@RestController
@RequestMapping("centre")
public class CentreController {

    @Autowired
    CentreService centreService;

    @Autowired
    CentreRepository centreRepository;

    @GetMapping("/list")
    ResponseEntity<List<Centre>> getListCentres(){
        return new ResponseEntity<>( centreRepository.findAll(),HttpStatus.OK); 
    }

    @PostMapping("/add")
    /*
     * le anaran'ilay variable eo am argument no anaran'ilay clé avy any amin'ny php
     */
    public ResponseEntity<String> postMethodName(@RequestParam String label, @RequestParam Integer typeCentreId) {
       try {
        centreService.save(label, typeCentreId);
        return new ResponseEntity<>("Inserted", HttpStatus.OK);
       } catch (Exception e) {
            return new ResponseEntity<>(e.getMessage()+" "+e.getCause(),HttpStatus.INTERNAL_SERVER_ERROR);
       }
    }

    @PostMapping("/delete")
    public ResponseEntity<String> deleteCentre(@RequestParam Integer id) {
        try {
            centreService.delete(id);
            return new ResponseEntity<>("deleted", HttpStatus.OK);
        } catch (Exception e) {
            return new ResponseEntity<>(e.getMessage()+" "+e.getCause(),HttpStatus.INTERNAL_SERVER_ERROR);
        }
    }

    @GetMapping("/find-by-id")
    public ResponseEntity<?> findByid(@RequestParam Integer id) {
        try {
            return new ResponseEntity<>(centreService.findByID(id),HttpStatus.OK);
        } catch (Exception e) {
            return new ResponseEntity<>(e.getMessage()+" "+e.getCause(),HttpStatus.INTERNAL_SERVER_ERROR);
        }
    }

    @PostMapping("update")
    public ResponseEntity<?> update(@RequestParam Integer id, @RequestParam String label, @RequestParam Integer typeCentreId ) {
        try {
            centreService.update(id, label, typeCentreId);
            return new ResponseEntity<>("Updated", HttpStatus.OK);
        } catch (Exception e) {
            return new ResponseEntity<>(e.getMessage()+" "+e.getCause(),HttpStatus.INTERNAL_SERVER_ERROR);
        }
    }    
    
}
