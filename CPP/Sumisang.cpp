#include <iostream>
#include <string>

using namespace std;

// Define the Sumisang class.
class Sumisang{
    private:
        string code;
        string name;
        string category;
        string desc;

    public:
        // A default constructor to initialize all attributes to empty strings.
        Sumisang(){
            this->code = "";
            this->name = "";
            this->category = "";
            this->desc = "";
        }

        // A parameterized constructor to initialize attributes with given values.
        Sumisang(string code, string name, string category, string desc){
            this->code = code;
            this->name = name;
            this->category = category;
            this->desc = desc;
        }

        // Setter and Getter for 'code'.
        void setcode(string code) {
            this->code = code;
        }
        string getcode() {
            return code;
        }

        // Setter and Getter for 'name'.
        void setname(string name) {
            this->name = name;
        }
        string getname() {
            return name;
        }

        // Setter and Getter for 'category'.
        void setcategory(string category) {
            this->category = category;
        }
        string getcategory() {
            return category;
        }

        // Setter and Getter for 'desc'.
        void setdesc(string desc) {
            this->desc = desc;
        }
        string getdesc() {
            return desc;
        }

        ~Sumisang(){
        }
};