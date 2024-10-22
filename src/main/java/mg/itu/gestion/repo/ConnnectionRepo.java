package mg.itu.gestion.repo;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import mg.itu.gestion.entity.users.Users;

public interface ConnnectionRepo extends JpaRepository<Users,String> {
    
    public List<Users> findByLoginAndPassword(String label,String password);

}
