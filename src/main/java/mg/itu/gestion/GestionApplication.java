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

		List<Rubrique> rubriques = rCentreService.findAll();

		for (Rubrique rubrique : rubriques) {
			System.out.println("[");
			System.out.println("\t"+rubrique.getId());
			System.out.println("\t"+rubrique.getLabel());
			List<RubriqueCentre> rubriqueCentres = rubrique.getRubriqueCentre();
			System.out.println("\t{");
			for (RubriqueCentre rubriqueCentre : rubriqueCentres) {
				System.out.println("\t\t"+rubriqueCentre.getCentre());
				System.out.println("\t\t"+rubriqueCentre.getPourcentage());
			}
			System.out.println("\t}");
			
			System.out.println("]");
		}

		

		
		
	}

}
