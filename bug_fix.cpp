#include <vector>

void fix_vector_bug() {
    std::vector<std::vector<double>*>* _data = new std::vector<std::vector<double>*>();
    // ...
    // Example usage:
    _data->push_back(new std::vector<double>());
    int i = 0;
    if (_data->size() > i) {
        _data->at(i)->clear();
    }
    // ...
    // Memory cleanup
    for (auto p : *_data) {
        delete p;
    }
    delete _data;
}
