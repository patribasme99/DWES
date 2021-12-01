package servlets;

import java.io.BufferedWriter;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileWriter;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.Scanner;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet(name = "ServletFormOpinion", urlPatterns = {"/ServletFormOpinion"})
public class ServletFormOpinion extends HttpServlet {

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        
        String error="";
        
        if (request.getParameter("enviar") != null) {
            if(request.getParameter("nombre").equals("")) {
                error+="Nombre vacío ";
            }
            if(request.getParameter("apellidos").equals("")) {
                error+="Apellidos vacío ";
            }
            if(request.getParameter("valoracion")==null) {
                error+="Valoracion vacía ";
            }
            if(request.getParameter("comentarios").equals("")) {
                error+="Comentarios vacíos ";
            }
            if(request.getParameter("secciones")==null) {
                error+="Secciones vacías ";
            }
            
            if (error.equals("") && request.getParameter("valoracion").equals("B")) {
                try {
                    BufferedWriter bw = new BufferedWriter(new FileWriter(getServletContext().getRealPath("seccionesFavoritas.txt"),true));
                    String nombre=request.getParameter("nombre");
                    String[] secciones=request.getParameterValues("secciones");
                    bw.write(nombre+":");
                    for (String seccion : secciones) {
                        bw.write(seccion+",");
                    }
                    
                    bw.newLine();
                    bw.close();
                } catch (IOException ioe){
                    ioe.printStackTrace();
                }
            }
        }
        
        
        try ( PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet ServletFormOpinion</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println("<p style='color: red'>"+error+"</p>");
            out.println("<form action='' method='POST'>");
            out.println("<label><b>Nombre: </b></label><input type='text' name='nombre' /><br><br>");
            out.println("<label><b>Apellidos: </b></label><input type='text' name='apellidos' /><br>");
            out.println("<p><b>Opinión que le ha merecido este sitio web</b></p>");
            out.println("<input type='radio' name='valoracion' value='B' />Buena<br>");
            out.println("<input type='radio' name='valoracion' value='R' />Regular<br>");
            out.println("<input type='radio' name='valoracion' value='M' />Mala<br><br>");
            out.println("<label>Comentarios</label><br>");
            out.println("<textarea name='comentarios'></textarea><br>");
            out.println("<p><b>Tus secciones favoritas</b></p>");
            try {
                File myObj = new File(getServletContext().getRealPath("secciones.txt"));
                Scanner myReader = new Scanner(myObj);
                while (myReader.hasNextLine()) {
                    String data = myReader.nextLine();
                    out.println("<input type='checkbox' name='secciones' value='"+data+"'>"+data+"<br>");
                }
                myReader.close();
            } catch (FileNotFoundException e) {
                System.out.println("An error occurred.");
                e.printStackTrace();
            }
            out.println("<br><input type='submit' name='enviar' value='Enviar opinion' />");
            out.println("</form>");
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

}
