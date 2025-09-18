class Sumisang:
    def __init__(self, code="", name="", category="", desc=""):
        # Private attributes
        self.__code = code
        self.__name = name
        self.__category = category
        self.__desc = desc

    # Getter and Setter for 'code'
    def code(self):
        return self.__code

    def code(self, value):
        self.__code = value

    # Getter and Setter for 'name'
    def name(self):
        return self.__name

    def name(self, value):
        self.__name = value

    # Getter and Setter for 'category'
    def category(self):
        return self.__category

    def category(self, value):
        self.__category = value

    # Getter and Setter for 'desc'
    def desc(self):
        return self.__desc

    def desc(self, value):
        self.__desc = value
