package ConversionCF;

public class ConversionCF {
    
    private double celsius;
    private double fahrenheit;
    
    public ConversionCF(double temp, String tipo){
        if(tipo.equals("c")) {
            celsius=temp;
            fahrenheit = (celsius * 9 / 5) + 32;
        } else if(tipo.equals("f")) {
            fahrenheit=temp;
            celsius = (fahrenheit - 32) * 5 / 9;
        }
    }

    public double getCelsius() {
        return celsius;
    }

    public double getFahrenheit() {
        return fahrenheit;
    }
}