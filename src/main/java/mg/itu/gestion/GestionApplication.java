package mg.itu.gestion;

import java.sql.Date;
import java.util.List;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.ConfigurableApplicationContext;

import mg.itu.gestion.entity.Centre;
import mg.itu.gestion.entity.Rubrique;
import mg.itu.gestion.entity.RubriqueCentre;
import mg.itu.gestion.service.CentreService;
import mg.itu.gestion.service.ChargeService;
import mg.itu.gestion.service.RubriqueService;

@SpringBootApplication
public class GestionApplication {

	public static void main(String[] args) {
		ConfigurableApplicationContext context = SpringApplication.run(GestionApplication.class, args);

		

		

	}

}
