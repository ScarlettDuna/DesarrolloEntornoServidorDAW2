<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:template match="/">
        <html>
            <head>
                <title>Resultado HTML</title>
                <style>
                    .contenedor {
                        display: flex;
                        justify-content: space-between;
                    }
                    
                    .listado {
                        column-count: 3;
                        column-rule: inset 2px rgb(13, 13, 14);
                        width: 80rem;
                    }
                    
                    .aside {
                        border: 1px solid black;
                    }
                </style>
            </head>
            <body>
                <h2>Listado de libros disponibles</h2>
                <div class="contenedor">
                    <div class="listado">
                        <ul>
                            <xsl:for-each select="biblioteca/genero/libro">
                                <xsl:if test="estado='libre'">
                                    <li>
                                    Novela-
                                        <xsl:value-of select="titulo" />
                                    :
                                        <ul>
                                            <li>
                                            Autor:
                                                <xsl:value-of select="autor" />
                                            </li>
                                            <li>
                                            Editorial:
                                                <xsl:value-of select="editorial" />
                                            </li>
                                            <li>
                                            Año de edición:
                                                <xsl:value-of select="anio_edicion" />
                                            </li>
                                        </ul>
                                    </li>
                                    <br></br>
                                    <br></br>
                                </xsl:if>
                            </xsl:for-each>
                        </ul>
                    </div>
                </div>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>