package Parcial2020;

import java.util.ArrayList;

public class Paciente {
    private String nombre;
    private int edad;
    private ArrayList<String> sintomas;
    private ArrayList<String> equipamientoNecesario;

    public Paciente(String nombre, int edad) {
        this.nombre = nombre;
        this.edad = edad;
        this.sintomas=new ArrayList<>();
        this.equipamientoNecesario= new ArrayList<>();
    }
 //AGREGA UN SINTOMA A LA LISTA DE SINTOMAS
    public void addSintoma(String sintoma){
        if(!sintomas.contains(sintoma)){
            sintomas.add(sintoma);
        }
    }
    //AGREGA UN EQUIPAMENTO A LA LISTA DE EQUIPAMIENTOS
    public void addEquipamientoNecesario(String equipamento){
        if(!sintomas.contains(equipamento)){
            sintomas.add(equipamento);
        }
    }

    //DEVUELVE LA EDAD DEL PACIENTE
    public int getEdad() {
        return edad;
    }

    //SI SINTOMAS CONTIENE EL SINTOMA QUE RECIBE POR PARAMETRO DEVUELVE TRUE
    public boolean contieneSintoma(String sintoma){
        return sintomas.contains(sintoma);
    }
    //SI EQUIPAMIENTO CONTIENE EL EQUIPAMENTO QUE RECIBE POR PARAMETRO DEVUELVE TRUE
    public boolean contieneEquipamento(String equipamento){
        return equipamientoNecesario.contains(equipamento);
    }
}
