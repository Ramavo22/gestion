package mg.itu.gestion;

import java.util.List;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.ConfigurableApplicationContext;

import mg.itu.gestion.entity.Rubrique;
import mg.itu.gestion.entity.RubriqueCentre;
import mg.itu.gestion.service.RubriqueService;

@SpringBootApplication
public class GestionApplication {

	public static void main(String[] args) {
		ConfigurableApplicationContext context = SpringApplication.run(GestionApplication.class, args);

		RubriqueService rCentreService = context.getBean(RubriqueService.class);

		Rubrique r = rCentreService.findById(1);

		Short unityId = 1;




		

		

		
		
	}

}
