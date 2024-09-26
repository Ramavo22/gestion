package mg.itu.gestion.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import mg.itu.gestion.entity.Centre;
import mg.itu.gestion.service.CentreService;

@RestController
@RequestMapping("api/Centre")
public class CentreController {

    @Autowired
    CentreService centreService;

    @GetMapping("/list")
    List<Centre> getListCentres(){
        return centreService.findAll();
    }
}
