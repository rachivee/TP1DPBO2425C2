class Sumisang:
    def __init__(self, code="", name="", category="", desc=""):
        # Private attributes
        self.__code = code
        self.__name = name
        self.__category = category
        self.__desc = desc

    # Getter and Setter for 'code'
    def getcode(self):
        return self.__code

    def setcode(self, value):
        self.__code = value

    # Getter and Setter for 'name'
    def getname(self):
        return self.__name

    def setname(self, value):
        self.__name = value

    # Getter and Setter for 'category'
    def getcategory(self):
        return self.__category

    def setcategory(self, value):
        self.__category = value

    # Getter and Setter for 'desc'
    def getdesc(self):
        return self.__desc

    def setdesc(self, value):
        self.__desc = value
