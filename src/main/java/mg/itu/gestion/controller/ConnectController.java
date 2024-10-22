package mg.itu.gestion.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import mg.itu.gestion.entity.users.Users;
import mg.itu.gestion.service.ConnectionService;

@RestController
@RequestMapping("connect")
public class ConnectController {
    @Autowired
    ConnectionService serv;

    @PostMapping("/requestConnection")
    public ResponseEntity<?> connectionUser(@RequestParam String nom, @RequestParam String password) {
        try {
            if (serv.testConnect(nom, password)) {
                return new ResponseEntity<>(serv.getUser(nom, password),HttpStatus.OK);
            }
        } catch (Exception e) {
            return new ResponseEntity<>(e.getMessage()+" "+e.getCause(),HttpStatus.INTERNAL_SERVER_ERROR);
        }
        return new ResponseEntity<>("Failed to connect",HttpStatus.INTERNAL_SERVER_ERROR);
    } 
}
