package mg.itu.gestion.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import mg.itu.gestion.entity.users.Users;
import mg.itu.gestion.repo.ConnnectionRepo;

@Service
public class ConnectionService {
    @Autowired
    ConnnectionRepo connecto;

    public boolean testConnect(String nom,String password) {
        if (connecto.findByLoginAndPassword(nom,password).size() > 0) {
            System.out.println("users : "+connecto.findByLoginAndPassword(nom,password).size());
            return true;
        }
        return false;
    }
    public Users getUser(String nom,String password) {
        if (connecto.findByLoginAndPassword(nom,password).size() > 0) {
            return (connecto.findByLoginAndPassword(nom,password).get(0));
        }
        return null;
    }

}
