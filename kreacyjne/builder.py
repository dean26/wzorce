'''
Builder pattern - It is used to construct a complex object step by step and the final step will return the object.
'''

from abc import ABC, abstractmethod

class Builder(ABC):

    @abstractmethod
    def build_header(self):
        pass

    @abstractmethod
    def build_body(self):
        pass

    @abstractmethod
    def build_footer(self):
        pass

class PageBuilder(Builder):

    header = ''
    body = ''
    footer = ''

    def build_header(self):
        self.header = 'header add...'

    def build_body(self):
        self.body = 'body add...'

    def build_footer(self):
        self.footer = 'footer add...'

    def get_all_parts(self):
        return self.header + self.body + self.footer

class Manager(object):

    builder = None

    def __init__(self, builder):
        self.builder = builder

    def build(self):
        self.builder.build_header()
        self.builder.build_body()
        self.builder.build_footer()


builder = PageBuilder()
manager = Manager(builder)
manager.build()
print(builder.get_all_parts())