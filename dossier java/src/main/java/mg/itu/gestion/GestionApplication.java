package mg.itu.gestion;

import java.sql.Date;
import java.util.List;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.ConfigurableApplicationContext;

import mg.itu.gestion.entity.Rubrique;
import mg.itu.gestion.entity.RubriqueCentre;
import mg.itu.gestion.service.ChargeService;
import mg.itu.gestion.service.RubriqueService;

@SpringBootApplication
public class GestionApplication {

	public static void main(String[] args) {
		ConfigurableApplicationContext context = SpringApplication.run(GestionApplication.class, args);

		ChargeService chargeService = context.getBean(ChargeService.class);


		Integer rubriqueId = 2;
		Double montantTotal = 1000000.0;
		Short unityId = 1;
		Date d = Date.valueOf("2024-09-26");

		chargeService.save(rubriqueId, montantTotal, unityId, d);
		System.out.println("nice");

		

	}

}
