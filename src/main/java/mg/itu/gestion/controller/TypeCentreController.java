package mg.itu.gestion.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import mg.itu.gestion.entity.TypeCentre;
import mg.itu.gestion.service.TypeCentreService;

@RestController
@RequestMapping("type-centre")
public class TypeCentreController {

    @Autowired
    TypeCentreService typeCentreService;


    @GetMapping("/list")
    List<TypeCentre> getList(){
        return typeCentreService.findAll();
    }
    
}
