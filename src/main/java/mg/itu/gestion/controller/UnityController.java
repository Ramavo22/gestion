package mg.itu.gestion.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import mg.itu.gestion.entity.Unity;
import mg.itu.gestion.service.UnityService;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;



@RestController
@RequestMapping("unity")
public class UnityController {

    @Autowired
    UnityService unityService;

    @GetMapping("/list")
    public List<Unity> getList() {
        return unityService.findAll();
    }


    @PostMapping("/add")
    public ResponseEntity<?> insert(@RequestParam String label){
        unityService.save(label);
        return ResponseEntity.ok("Inserted");
    }

    @PostMapping("/delete")
    public ResponseEntity<?> delete(@RequestParam Integer id) {
        unityService.delete(id);
        
        return ResponseEntity.ok("delete");
    }

    
    
    
    
}
