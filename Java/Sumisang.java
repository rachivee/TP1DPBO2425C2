class Sumisang{
    // Attributes
    private String code, name, category, desc;
    // Constructors
    public Sumisang(){
        this.code = "";
        this.name = "";
        this.category = "";
        this.desc = "";
    }
    // Parameterized Constructor
    public Sumisang(String code, String name, String category, String desc){
        this.code = code;
        this.name = name;
        this.category = category;
        this.desc = desc;
    }

    // Setter and Getter for 'code'
    public void setCode(String code) {
        this.code = code;
    }
    public String getCode() {
        return this.code;
    }

    // Setter and Getter for 'name'
    public void setName(String name) {
        this.name = name;
    }
    public String getName() {
        return this.name;
    }

    // Setter and Getter for 'category'
    public void setCategory(String category) {
        this.category = category;
    }
    public String getCategory() {
        return this.category;
    }

    // Setter and Getter for 'desc'
    public void setDesc(String desc) {
        this.desc = desc;
    }
    public String getDesc() {
        return this.desc;
    }   
}