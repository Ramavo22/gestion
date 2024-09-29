package mg.itu.gestion.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import mg.itu.gestion.entity.Unity;
import mg.itu.gestion.service.UnityService;
import org.springframework.web.bind.annotation.GetMapping;


@RestController
@RequestMapping("unity")
public class UnityController {

    @Autowired
    UnityService unityService;

    @GetMapping("/list")
    public List<Unity> getList() {
        return unityService.findAll();
    }
    
    
}
