(TeX-add-style-hook
 "definicion"
 (lambda ()
   (TeX-add-to-alist 'LaTeX-provided-package-options
                     '(("inputenc" "utf8") ("fontenc" "T1") ("babel" "spanish" "mexico") ("geometry" "margin=2cm")))
   (TeX-run-style-hooks
    "latex2e"
    "article"
    "art10"
    "pslatex"
    "inputenc"
    "fontenc"
    "babel"
    "graphicx"
    "geometry")
   (LaTeX-add-labels
    "fig:1"))
 :latex)

