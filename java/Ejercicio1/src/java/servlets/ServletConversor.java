package servlets;

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;


public class ServletConversor extends HttpServlet {

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        double cel = 0;
        double fah= 0;
        
        if(request.getParameter("cel-fah") != null) {
            String celsius = request.getParameter("celsius");
            
            if(celsius == null || celsius.equals("")) {
                dibujarError(request, response, "Debes indicar los grados Celsius");
                return;
            } else {
                try {
                    cel = Double.parseDouble(celsius);
                    fah = (cel * 9 / 5) + 32;
                } catch (NumberFormatException e) {
                    dibujarError(request, response, "La temperatura debe ser numérica");
                }
            }
        } else {
            if(request.getParameter("fah-cel") != null) {
                String fahrenheit = request.getParameter("fahrenheit");
                
                if(fahrenheit == null || fahrenheit.equals("")) {
                    dibujarError(request, response, "Debes indicar los grados Fahrenheit");
                    return;
                } else {
                    try {
                        fah = Double.parseDouble(fahrenheit);
                        cel = (fah - 32) * 5 / 9;
                    } catch (NumberFormatException e) {
                        //errorPage(request, response, "La temperatura debe ser numérica");
                    }
                }
            }
        }
        
        try ( PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet ServletConversor</title>");            
            out.println("</head>");
            out.println("<body>"); 
            out.println("<h1>Resultado de la conversión:</h1>");
            out.println("<p><b>Valor en celsius</b>: " + cel + "</p>");
            out.println("<p><b>Valor en fahrenheit</b>: " + fah + "</p>");
            out.println("<a href='http://localhost:8080/Ejercicio1'>Enlace para volver al formulario</a>");
            out.println("</body>");
            out.println("</html>");
        }
    }
    
    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>
    
    
    protected void dibujarError(HttpServletRequest request, HttpServletResponse response, String mensaje) throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {

            out.println(
                    "<!DOCTYPE html>"
                    + "<html>"
                    + "<head>"
                    + "<title>Error</title>"
                    + "</head>"
                    + "<body>"
                    + "<p><b>ERROR: </b>" + mensaje + "</p>"
                    + "<a id='error' href='http://localhost:8080/Ejercicio1'>Enlace para volver al formulario</a>"
                    + "</body>"
                    + "</html>"
            );
        }
    }
}
